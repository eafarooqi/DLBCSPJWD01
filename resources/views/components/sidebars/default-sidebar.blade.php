<x-template.sidebar-item :title="__('Dashboard')" :link="url('/')" :icon="'sliders'" />

<x-template.sidebar-parent-item :active="$active === 'books'" title="{{ __('My Collection') }}" :icon="'collection'">

    <x-template.sidebar-child-item :title="__('Add New')" link="{{ route('books.create') }}" />
    <x-template.sidebar-child-item :title="__('All Books')" link="{{ route('books') }}"  />
    <x-template.sidebar-child-item :title="__('Search Books')" link="#" />

</x-template.sidebar-parent-item>

<x-template.sidebar-parent-item :active="$active === 'manage'" :title="'Management'" :icon="'settings'">

    <x-template.sidebar-child-item :title="__('Categories')" link="{{ route('manage.categories.index') }}" />
    <x-template.sidebar-child-item :title="__('Genres')" link="{{ route('manage.genres.index') }}" />

</x-template.sidebar-parent-item>
