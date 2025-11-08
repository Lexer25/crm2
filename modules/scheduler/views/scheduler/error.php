<div class="row">
    <div class="col-12">
        <div class="alert alert-danger">
            <h4 class="alert-heading">
                <i class="fas fa-exclamation-triangle"></i> Error
            </h4>
            <p class="mb-0"><?= HTML::chars($error) ?></p>
        </div>
        
        <div class="text-center mt-4">
            <a href="/scheduler" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </a>
        </div>
    </div>
</div>