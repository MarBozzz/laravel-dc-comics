<form onsubmit="return confirm('Please confirm you want to permanently delete {{$comic->title}}')" class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="delete" >Delete</button>
</form>

