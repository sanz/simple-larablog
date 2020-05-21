<!-- Search Widget -->
<div class="card my-4 border-primary">
    <h5 class="card-header bg-primary text-white">Search</h5>
    <div class="card-body">
        <form action="{{ url('/search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="Search for..." required>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
</div>