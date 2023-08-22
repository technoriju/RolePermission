<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateUiController extends Controller
{
    public function dashboard()
    {
        return view('template.pages.dashboard.dashboard');
    }
    public function charts()
    {
        return view('template.pages.charts.chartjs');
    }
    public function documentation()
    {
        return view('template.pages.documentation.documentation');
    }
    public function form()
    {
        return view('template.pages.forms.basic_elements');
    }
    public function icon()
    {
        return view('template.pages.icons.mdi');
    }
    public function table()
    {
        return view('template.pages.tables.basic-table');
    }
    public function button()
    {
        return view('template.pages.ui-features.buttons');
    }
    public function dropdown()
    {
        return view('template.pages.ui-features.dropdowns');
    }
    public function typography()
    {
        return view('template.pages.ui-features.typography');
    }

}
