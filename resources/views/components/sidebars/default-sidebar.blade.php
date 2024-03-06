
<x-template.sidebar-item :title="__('Dashboard')" :link="url('/')" :icon="'sliders'" />

<x-template.sidebar-parent-item :active="$active === 'collection'" title="{{ __('My Collection') }}" :icon="'collection'">

    <x-template.sidebar-child-item :title="__('Add New')" link="#" />
    <x-template.sidebar-child-item :title="__('All Books')" link="#"  />
    <x-template.sidebar-child-item :title="__('Search Books')" link="#" />

</x-template.sidebar-parent-item>

<x-template.sidebar-parent-item :active="$active === 'manage'" :title="'Management'" :icon="'settings'">

    <x-template.sidebar-child-item :title="__('Categories')" link="#" />
    <x-template.sidebar-child-item :title="__('Genres')" link="{{ route('manage.genres.index') }}" />

</x-template.sidebar-parent-item>
