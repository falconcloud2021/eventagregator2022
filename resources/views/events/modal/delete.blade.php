<div class="modal fade" id="modalDelete{{$event->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="{{route('event.destroy', $event->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Видалення спорт-події</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ви ви впевнені що хочете видалити спорт-подію <b>{{$event->event_name}}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn border-secondary" data-bs-dismiss="modal">Відміна</button>
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </div>
            </div>
        </div>
    </form>
</div>
