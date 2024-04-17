<div>
    <x-template.notification />

    <form wire:submit.prevent="update" novalidate hasJsValidation>
        <div class="card shadow-sm components-section">
            <div class="card-header border-bottom border-info">
                {{ __('Book') }}
                <div class="text-center float-end" wire:loading>
                    <img class="" src="{{ asset('assets/img/ajax-loader.gif') }}" />
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <x-form.input name="bookForm.name" wire:model="bookForm.name" :label="__('Name')" required />
                        <x-form.input name="bookForm.isbn" wire:model="bookForm.isbn" :label="__('ISBN')" />
                        <x-form.input name="bookForm.author" wire:model="bookForm.author" :label="__('Author')" />

                        <x-form.tom-select name="bookForm.genre_id" wire:model="bookForm.genre_id" :label="__('Genre')" :options="$genreOptions" :value="$bookForm->genre_id" />
                        <x-form.tom-select name="bookForm.category_id" wire:model="bookForm.category_id" :label="__('Category')" :options="$categoryOptions" :value="$bookForm->category_id" :has-option-groups="true" />

                        <x-form.textarea name="bookForm.description" wire:model="bookForm.description" :label="__('Description')" />
                        <x-form.input name="bookForm.total_pages" wire:model="bookForm.total_pages" type="number" min="0" :label="__('Total Pages')" />
                        <x-form.flat-pickr name="bookForm.published_date" wire:model="bookForm.published_date" :label="__('Published Date')" />
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center ">
                            <h2>{{ __('Book Cover') }}</h2>

                            <div class="d-flex justify-content-center">
                                <div class="cover-image-container text-center">

                                    @if ($bookForm->image && !is_string($bookForm->image))
                                        <img alt="{{ $bookForm->name }}" src="{{ $bookForm->image->temporaryUrl() }}" class="img-responsive mt-2 image" width="200">
                                    @elseif($bookForm->image)
                                        <img alt="{{ $bookForm->name }}" src="{{ $bookForm->image }}" class="img-responsive mt-2 image" width="200">
                                    @endif

                                    @if ($bookForm->image)
                                        <div class="middle d-grid gap-2">
                                            <button type="button" class="btn btn-danger btn-lg" wire:click="removeCover">{{ __('Remove') }}</button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-2" style="max-width: 300px; margin: 0 auto;">
                                <x-form.filepond
                                    wire:model="bookForm.image"
                                    imagePreviewMaxHeight="250"
                                    allowRevert="false"
                                />
                            </div>
                            <small>For best results, use an image at least 180px by 288px in .jpg format</small>
                        </div>

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer border-top border-success p-2 footer-light">
                <button type="submit" id="btnFormSubmit" class="btn btn-primary float-end">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>


