<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Caurosel as _Caurosel;
use App\Traits\WithSweetAlert;

class Caurosel extends Component
{

    use WithSweetAlert;
    use WithFileUploads;

    public $slides = [];
    public $isEditModeOn = false;
    public $slideId;
    public $oldSlide;

    // Form variable
    public $link;
    public $image;
    public $isPublished = true;


    protected $rules = [

        'link' => [
            'nullable',
            'string'
        ],
        'image' => ['required'],

    ];


    protected $listeners = [
        'onSlideDelete' => 'deleteSlideHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }

    public function render()
    {
        return view('admin.components.caurosel');
    }

    public function createSlide()
    {
        $this->validate();

        $slide = _Caurosel::create([
            'image_link' => $this->link,
            'is_published' => $this->isPublished,
        ]);

        if($slide){
            $slide->addMedia($this->image)->toMediaCollection('image');

            $this->reset();

            $this->preparedInitialData();
    
            return $this->success('Created', 'Slide created successfully');
        }

        return $this->error('Failed', 'Failed to create slide', 'Something went wrong try again');

    }


    public function updateSlide()
    {
        $this->validate([
            'image' => ['nullable']
        ]);

        $slide = _Caurosel::find($this->slideId);

        $slide->image_link = $this->link;
        $slide->is_published = $this->isPublished;

        if($this->image){
            $slide->addMedia($this->image)->toMediaCollection('image');
        }

        if($slide->save()){
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Updated', 'Slide updated successfully');
        }

        return $this->error('Failed', 'Failed to update. Try again');
    }


    public function removeImage()
    {
        $this->image = null;
    }


    public function confirmDeleteSlide($id)
    {
        return $this->ifConfirmThenDispatch('onSlideDelete', $id, 'Are you sure ?', 'Slide will delete permanently');
    }


    public function deleteSlideHandeler($id)
    {
        if(_Caurosel::destroy($id)) {

            $this->preparedInitialData();
            return $this->success('Deleted', 'Slide deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enableSlideEditMode($id)
    {
        $slide = _Caurosel::find($id);

        $this->slideId = $slide->id;
        $this->isPublished = $slide->is_published;
        $this->link = $slide->image_link;
        $this->oldSlide = $slide->getFirstMediaUrl('image');

        $this->isEditModeOn = true;

    }

    public function cancelSlideEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->isEditModeOn = false;
    }


    private function preparedInitialData()
    {
        $this->slides = _Caurosel::all();
    }
}
