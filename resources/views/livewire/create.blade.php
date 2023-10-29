<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Enter Title" wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="content">content:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" wire:model="content"
                    placeholder="Enter content"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                    wire:model="status">

                    <option value="1">Draft</option>
                    <option value="2">Publish</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
                <button wire:click.prevent="cancel()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>
