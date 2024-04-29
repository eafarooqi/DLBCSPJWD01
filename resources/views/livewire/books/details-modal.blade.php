<div>
    <x-base.modal id="bookDetailsModal" title="{{ __('Book Details') }}" :showSubmit="false" :show-cancel="false" class="modal-lg">
        <x-slot name="body">

            <h2>{{ $details['name'] ?? '' }}</h2>


            <div class="row">
                <div class="col-sm-8">
                    <x-form.show :label="__('Name')" :value="$details['name'] ?? ''" />
                    <x-form.show :label="__('Author')" :value="$details['author'] ?? ''" />
                    <x-form.show :label="__('ISBN')" :value="$details['isbnSelected'] ?? ''" />
                    <x-form.show :label="__('Total Pages')" :value="$details['totalPages'] ?? ''" />
                    <x-form.show :label="__('Book URL')" :value="$details['bookUrl'] ?? ''" />
                </div>
                <div class="col-sm-4">
                    <div class="text-center ">
                        <div class="d-flex justify-content-center">
                            <div class="cover-image-container text-center">
                                <img alt="{{ $details['name'] ?? '' }}" src="{{ $details['imageUrl'] }}" class="img-responsive mt-2 image" width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">{{ __('Schließen') }}</button>
        </x-slot>

    </x-base.modal>
</div>
