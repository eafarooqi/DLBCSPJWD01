<div>
    <x-template.notification :show-errors="true" />

    <form wire:submit.prevent="add" novalidate hasJsValidation>
        <div class="card shadow-sm components-section">
            <div class="card-header border-bottom border-info">
                {{ __('Book') }}
                <div class="text-center float-end" wire:loading>
                    <img class="" src="{{ asset('assets/img/ajax-loader.gif') }}" />
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <x-form.input name="bookForm.name" wire:model="bookForm.name" :label="__('Name')" required />
                        <x-form.input name="bookForm.isbn" wire:model="bookForm.isbn" :label="__('ISBN')" />
                        <x-form.input name="bookForm.author" wire:model="bookForm.author" :label="__('Author')" />

                        <x-form.tom-select name="bookForm.genre_id" wire:model="bookForm.genre_id" :label="__('Genre')" :options="$genreOptions" />
                        <x-form.tom-select name="bookForm.category_id" wire:model="bookForm.category_id" :label="__('Category')" :options="$categoryOptions" :has-option-groups="true" />

                        <x-form.textarea name="bookForm.description" wire:model="bookForm.description" :label="__('Description')" />
                        <x-form.input name="bookForm.total_pages" wire:model="bookForm.total_pages" type="number" min="0" :label="__('Total Pages')" />
                        <x-form.flat-pickr name="bookForm.published_date" wire:model="bookForm.published_date" :label="__('Published Date')" />

                       {{-- @if ($bookForm->image)
                            <img src="{{ $bookForm->image->temporaryUrl() }}">
                        @endif--}}

                        <x-form.filepond
                            wire:model="bookForm.image"
                            allowImagePreview
                            imagePreviewMaxHeight="250"
                        />
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer border-top border-success p-2 footer-light">
                <button type="submit" id="btnFormSubmit" class="btn btn-primary float-end">{{ __('Add') }}</button>
            </div>
        </div>
    </form>
</div>
