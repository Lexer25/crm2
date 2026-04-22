// monitors/assets/js/event-monitor.js

class EventMonitor {
    constructor(options = {}) {
        this.options = {
            apiUrl: '/crm2/events/getEvent',
            updateInterval: 1000,
            maxRows: 20,
            withPhoto: true,
            autoStart: true,
            debug: false,
            ...options
        };
        
        this.isRunning = false;
        this.timer = null;
        this.lastEventId = null;
        this.eventCount = 0;
        this.tableBody = null;
        
        this.init();
    }
    
    init() {
        this.tableBody = document.getElementById('txtHint');
        if (!this.tableBody) {
            console.error('Table body not found');
            return;
        }
        
        this.bindEvents();
        this.loadSettings();
        
        if (this.options.autoStart) {
            this.start();
        }
    }
    
    bindEvents() {
        // Кнопка остановки/запуска
        const stopCheckbox = document.getElementById('updatemonitor');
        if (stopCheckbox) {
            stopCheckbox.addEventListener('change', (e) => {
                e.target.checked ? this.stop() : this.start();
            });
        }
        
        // Переключатель фото
        const photoCheckbox = document.getElementById('photomonitor');
        if (photoCheckbox) {
            photoCheckbox.addEventListener('change', (e) => {
                this.options.withPhoto = e.target.checked;
                this.saveSettings();
            });
        }
        
        // Селектор количества строк
        const sizeSelect = document.getElementById('selectsSize');
        if (sizeSelect) {
            sizeSelect.addEventListener('change', (e) => {
                this.options.maxRows = parseInt(e.target.value, 10);
                this.saveSettings();
                this.limitTableRows();
            });
        }
        
        // Обработка пробела
        document.addEventListener('keypress', (e) => {
            if (e.keyCode === 32 && stopCheckbox) {
                e.preventDefault();
                stopCheckbox.checked = !stopCheckbox.checked;
                stopCheckbox.dispatchEvent(new Event('change'));
            }
        });
        
        // Обработка видимости страницы
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && this.isRunning) {
                this.stop();
            } else if (!document.hidden && !this.isRunning && stopCheckbox && !stopCheckbox.checked) {
                this.start();
            }
        });
    }
    
    start() {
        if (this.isRunning) return;
        
        this.isRunning = true;
        this.log('Monitor started');
        this.fetchEvents();
        
        this.timer = setInterval(() => {
            if (this.isRunning) {
                this.fetchEvents();
            }
        }, this.options.updateInterval);
    }
    
    stop() {
        if (this.timer) {
            clearInterval(this.timer);
            this.timer = null;
        }
        this.isRunning = false;
        this.log('Monitor stopped');
    }
    
    async fetchEvents() {
        try {
            const url = new URL(this.options.apiUrl, window.location.origin);
            url.searchParams.set('photo', this.options.withPhoto ? '1' : '0');
            url.searchParams.set('limit', this.options.maxRows);
            url.searchParams.set('format', 'json');
            
            const response = await fetch(url.toString(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }
            
            const data = await response.json();
            
            if (!data.success) {
                this.log('API error:', data.error);
                return;
            }
            
            if (data.hasNew && data.html) {
                this.appendEvents(data.html);
                this.updateEventCounter(data.count);
            }
            
            if (data.lastId) {
                this.lastEventId = data.lastId;
            }
            
            this.updateCurrentTime();
            
        } catch (error) {
            this.log('Fetch error:', error);
        }
    }
    
    appendEvents(html) {
        if (!html) return;
        
        // Вставляем новые события в начало
        this.tableBody.insertAdjacentHTML('afterbegin', html);
        
        // Ограничиваем количество строк
        this.limitTableRows();
        
        // Обновляем модальные окна для фото
        if (this.options.withPhoto) {
            this.createPhotoModals();
        }
        
        // Анимация новых строк
        this.animateNewRows();
    }
    
    limitTableRows() {
        while (this.tableBody.rows.length > this.options.maxRows) {
            this.tableBody.deleteRow(this.tableBody.rows.length - 1);
        }
        this.updateVisibleCount();
    }
    
    createPhotoModals() {
        const rows = this.tableBody.rows;
        const limit = Math.min(rows.length, window.windowsCountsetings || 10);
        
        for (let i = 0; i < limit; i++) {
            const row = rows[i];
            const photoCell = row.cells.namedItem('photo');
            const eventNameCell = row.cells.namedItem('even_name');
            const peopleNameCell = row.cells.namedItem('people_name');
            const orgNameCell = row.cells.namedItem('org_name');
            const postCell = row.cells.namedItem('people_post');
            const deviceCell = row.cells.namedItem('device_name');
            
            if (photoCell && typeof createModal === 'function') {
                createModal(
                    eventNameCell?.innerText || '',
                    photoCell.innerText,
                    peopleNameCell?.innerText || '',
                    orgNameCell?.innerText || '',
                    postCell?.innerText || '',
                    deviceCell?.innerText || ''
                );
            }
        }
    }
    
    animateNewRows() {
        const rows = this.tableBody.rows;
        for (let i = 0; i < Math.min(5, rows.length); i++) {
            rows[i].style.transition = 'background-color 0.5s';
            rows[i].style.backgroundColor = '#ffffcc';
            setTimeout(() => {
                if (rows[i]) {
                    rows[i].style.backgroundColor = '';
                }
            }, 1000);
        }
    }
    
    updateEventCounter(newCount) {
        this.eventCount += newCount;
        const counterEl = document.getElementById('eventCounter');
        if (counterEl) {
            counterEl.textContent = `Всего событий: ${this.eventCount}`;
        }
    }
    
    updateVisibleCount() {
        const visibleEl = document.getElementById('visibleEventCount');
        if (visibleEl) {
            visibleEl.textContent = `На экране: ${this.tableBody.rows.length}`;
        }
    }
    
    updateCurrentTime() {
        const timeEl = document.getElementById('currentTime');
        if (timeEl) {
            const now = new Date();
            timeEl.textContent = now.toLocaleTimeString('ru-RU');
        }
    }
    
    saveSettings() {
        try {
            localStorage.setItem('eventMonitor', JSON.stringify({
                maxRows: this.options.maxRows,
                withPhoto: this.options.withPhoto
            }));
        } catch (e) {
            this.log('Cannot save settings:', e);
        }
    }
    
    loadSettings() {
        try {
            const saved = localStorage.getItem('eventMonitor');
            if (saved) {
                const settings = JSON.parse(saved);
                this.options.maxRows = settings.maxRows || this.options.maxRows;
                this.options.withPhoto = settings.withPhoto !== undefined ? settings.withPhoto : this.options.withPhoto;
                
                // Применяем загруженные настройки к UI
                const sizeSelect = document.getElementById('selectsSize');
                if (sizeSelect) sizeSelect.value = this.options.maxRows;
                
                const photoCheckbox = document.getElementById('photomonitor');
                if (photoCheckbox) photoCheckbox.checked = this.options.withPhoto;
            }
        } catch (e) {
            this.log('Cannot load settings:', e);
        }
    }
    
    log(...args) {
        if (this.options.debug) {
            console.log('[EventMonitor]', ...args);
        }
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
    window.eventMonitor = new EventMonitor({
        updateInterval: (window.timeUpdate || 2) * 1000,
        debug: window.location.hostname === 'localhost'
    });
});