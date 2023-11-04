<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataTable as $post)
                    <tr>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->content }}
                        </td>
                        <td>{{ $post->status == 1 ? 'Draft' : 'Publish' }}</td>
                        <td>
                            <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="destroy({{ $post->id }})"
                                class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">
                            No Posts Found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
