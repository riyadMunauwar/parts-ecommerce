<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Models\Footer as _Footer;

class Footer extends Component
{
    use WithSweetAlert;

    public $column_one = 'column_one';
    public $column_two = 'column_two';
    public $column_three = 'column_three';
    public $column_four = 'column_four';

    public $footerSectionOneName;
    public $footerSectionTwoName;
    public $footerSectionThreeName;
    public $footerSectionFourName;

    public $footerSectionOneItems = [];
    public $footerSectionTwoItems = [];
    public $footerSectionThreeItems = [];
    public $footerSectionFourItems = [];

    public $footerSectionOneItemName;
    public $footerSectionOneItemLink;

    public $footerSectionTwoItemName;
    public $footerSectionTwoItemLink;

    public $footerSectionThreeItemName;
    public $footerSectionThreeItemLink;

    public $footerSectionFourItemName;
    public $footerSectionFourItemLink;


    public $isColumnOneEditModeOn = false;
    public $isColumnTwoEditModeOn = false;
    public $isColumnThreeEditModeOn = false;
    public $isColumnFourEditModeOn = false;

    public $columnOneItemId;
    public $columnTwoItemId;
    public $columnThreeItemId;
    public $columnFourItemId;


    protected $listeners = [
        'onMenuItemDelete' => 'menuItemDeleteHandeler'
    ];

    public function mount()
    {
        $this->preparedColumnOneInitData();
        $this->preparedColumnTwoInitData();
        $this->preparedColumnThreeInitData();
        $this->preparedColumnFourInitData();
    }

    public function render()
    {
        return view('admin.components.footer');
    }



    public function columnOneAddItem()
    {
        $this->validate([
            'footerSectionOneItemName' => ['required', 'string']
        ]);

        $save =_Footer::create([
                'column_name' => $this->column_one,
                'footer_section_name' => $this->footerSectionOneName,
                'menu_item_name' => $this->footerSectionOneItemName,
                'menu_item_link' => $this->footerSectionOneItemLink,
            ]);
        
        if($save){
            $this->resetColumnOne();
            $this->preparedColumnOneInitData();
            return $this->success('Created', 'Menu item added successfully');
        }

        return $this->error('Failed', 'Failed to create new menu item. Something went wrong !');

    }


    public function columnOneUpdateItem()
    {

    }


    public function columnTwoAddItem()
    {
        
    }


    public function columnTwoUpdateItem()
    {
        
    }


    public function columnThreeAddItem()
    {
        
    }


    public function columnThreeUpdateItem()
    {
        
    }


    public function columnFourAddItem()
    {
        
    }


    public function columnFourUpdateItem()
    {
        
    }


    public function confirmMenuItemDelete($id)
    {
        return $this->ifConfirmThenDispatch('onMenuItemDelete', $id, 'Are you sure ?', 'Menu item will delete permanently');
    }


    public function menuItemDeleteHandeler($id)
    {
        if(_Footer::destroy($id)){
            $this->preparedAllInitData();
            return $this->success('Success', 'Menu item deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong try again !');
    }


    // 
    public function enableEditMode($column, $id)
    {
        if($column === 'column_one')
        {
            $item = _Footer::find($id);

            $this->columnOneItemId = $item->id;
            $this->footerSectionOneName = $item->footer_section_name;
            $this->footerSectionOneItemName = $item->menu_item_name;
            $this->footerSectionOneItemLink = $item->menu_item_link;

            $this->isColumnOneEditModeOn = true;
        }

        if($column === 'column_two')
        {
            $item = _Footer::find($id);

            $this->columnTwoItemId = $item->id;
            $this->footerSectionTwoName = $item->footer_section_name;
            $this->footerSectionTwoItemName = $item->menu_item_name;
            $this->footerSectionTwoItemLink = $item->menu_item_link;

            $this->isColumnTwoEditModeOn = true;
        }

        if($column === 'column_three')
        {
            $item = _Footer::find($id);

            $this->columnThreeItemId = $item->id;
            $this->footerSectionThreeName = $item->footer_section_name;
            $this->footerSectionThreeItemName = $item->menu_item_name;
            $this->footerSectionThreeItemLink = $item->menu_item_link;

            $this->isColumnThreeEditModeOn = true;
        }

        if($column === 'column_four')
        {
            $item = _Footer::find($id);

            $this->columnFourItemId = $item->id;
            $this->footerSectionFourName = $item->footer_section_name;
            $this->footerSectionFourItemName = $item->menu_item_name;
            $this->footerSectionFourItemLink = $item->menu_item_link;

            $this->isColumnFourEditModeOn = true;
        }
    }

    public function cancelEditMode($column)
    {
        if($column === 'column_one')
        {
            $this->resetColumnOne();
            $this->isColumnOneEditModeOn = false;
        }

        if($column === 'column_two')
        {
            $this->resetColumnTwo();
            $this->isColumnTwoEditModeOn = false;
        }

        if($column === 'column_three')
        {
            $this->resetColumnThree();
            $this->isColumnThreeEditModeOn = false;
        }

        if($column === 'column_four')
        {
            $this->resetColumnFour();
            $this->isColumnFourEditModeOn = false;
        }
    }


    private function preparedColumnOneInitData()
    {
        $this->footerSectionOneItems = _Footer::where('column_name', $this->column_one)->get();
    }

    private function preparedColumnTwoInitData()
    {
        $this->footerSectionTwoItems = _Footer::where('column_name', $this->column_two)->get();
    }

    private function preparedColumnThreeInitData()
    {
        $this->footerSectionThreeItems = _Footer::where('column_name', $this->column_three)->get();
    }

    private function preparedColumnFourInitData()
    {
        $this->footerSectionFourItems = _Footer::where('column_name', $this->column_four)->get();
    }


    private function preparedAllInitData()
    {
        $this->preparedColumnOneInitData();
        $this->preparedColumnTwoInitData();
        $this->preparedColumnThreeInitData();
        $this->preparedColumnFourInitData();
    }

    private function resetColumnOne()
    {
        $this->footerSectionOneItemName = '';
        $this->footerSectionOneItemLink = '';
    }

    private function resetColumnTwo()
    {
        $this->footerSectionTwoItemName = '';
        $this->footerSectionTwoItemLink = '';
    }

    private function resetColumnThree()
    {
        $this->footerSectionThreeItemName = '';
        $this->footerSectionThreeItemLink = '';
    }

    private function resetColumnFour()
    {
        $this->footerSectionFourItemName = '';
        $this->footerSectionFourItemLink = '';
    }


}
