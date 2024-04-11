<?php

namespace App\Themes\PowerGrid;

use PowerComponents\LivewirePowerGrid\Themes\Bootstrap5;
use PowerComponents\LivewirePowerGrid\Themes\Components\Table;
use PowerComponents\LivewirePowerGrid\Themes\Theme;

class BootstrapExtended extends Bootstrap5
{
    public function table(): Table
    {
        return Theme::table('table table-flush table-sm table-bordered table-hover table-striped table-rounded table-checkable table-highlight-head mb-2')
            ->div('table-responsive col-md-12 overflow-auto', 'margin: 10px 0 10px; max-height:450px;')
            ->thead('table-dark')
            ->thAction('')
            ->tdAction('')
            ->tr('')
            ->th('sticky', 'white-space: nowrap;min-width: 50px;font-size: 0.75rem;padding-top: 8px;padding-bottom: 8px;position:sticky;top:0;z-index:2;')
            ->tbody('')
            ->tdBodyEmpty('', 'vertical-align: middle; line-height: normal;')
            ->tdBodyTotalColumns('', 'font-size: 0.875rem; line-height: 1.25rem; --tw-text-opacity: 1; color: rgb(76 79 82 / var(--tw-text-opacity)); padding-left: 0.75rem; padding-right: 0.75rem; padding-top: 0.5rem; padding-bottom: 0.5rem;')
            ->tdBody('', 'vertical-align: middle; line-height: normal;white-space: nowrap;');
    }
}
