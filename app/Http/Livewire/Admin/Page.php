<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Traits\WithSweetAlert;
use App\Models\Page as _Page;

class Page extends Component
{
    use WithSweetAlert;

    public $locale;

    public $pages = [];
    public $isEditModeOn = false;
    public $pageId;


    // Form variable
    public $metaTitle;
    public $metaTags;
    public $metaDescription;
    public $name;
    public $slug;
    public $content;
    public $isPublished = true;



    protected $listeners = [
        'onPageDelete' => 'deletePageHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }


    public function render()
    {
        return view('admin.components.page');
    }


    public function updatedLocale($localeValue)
    {
        $this->preparedInitialData($localeValue);

        if($this->isEditModeOn){
            $this->enablePageEditMode($this->pageId);
        }
    }

    public function createPage()
    {


        if(!$this->isInputDataValid()){
            return $this->error('Validation failed', 'Name and Slug must be required');
        }

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }


        $page = _Page::create([
            'meta_title' => $this->metaTitle,
            'meta_tags' => $this->metaTags,
            'meta_description' => $this->metaDescription,
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_published' => $this->isPublished,
        ]);


        if($page){

            $locale = $this->locale;

            $this->reset();

            $this->preparedInitialData($locale);

            $this->dispatchBrowserEvent('content:clear');
    
            return $this->success('Created', 'Page created successfully');
        }

        return $this->error('Failed', 'Failed to create Page', 'Something went wrong try again');

    }



    public function updatePage()
    {

        if(!$this->isInputDataValid()){
            return $this->error('Validation failed', 'Name and Slug must be required');
        }

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }


        $page = _Page::find($this->pageId);

        $page->meta_title = $this->metaTitle;
        $page->meta_tags = $this->metaTags;
        $page->meta_description = $this->metaDescription;
        $page->name = $this->name;
        $page->slug = $this->slug;
        $page->content = $this->content;
        $page->is_published = $this->isPublished;

        if($page->save()){

            $locale = $this->locale;

            $this->reset();

            $this->preparedInitialData($locale);

            $this->dispatchBrowserEvent('content:clear');

            return $this->success('Updated', 'Page updated successfully');

        }

        return $this->error('Failed', 'Failed to update. Try again');

    }



    public function confirmDeletePage($id)
    {
        $this->reset();

        $this->preparedInitialData();

        $this->dispatchBrowserEvent('content:clear');
        
        return $this->ifConfirmThenDispatch('onPageDelete', $id, 'Are you sure ?', 'Page will delete permanently');
    }


    public function deletePageHandeler($id)
    {

        if(_Page::destroy($id)) {

            $this->preparedInitialData();

            return $this->success('Deleted', 'Page deleted successfully');

        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enablePageEditMode($id)
    {

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $page = _Page::find($id);

        $this->pageId = $page->id;
        $this->metaTitle = $page->meta_title;
        $this->metaDescription = $page->meta_description;
        $this->metaTags = $page->meta_tags;
        $this->name = $page->name;
        $this->slug = $page->slug;
        $this->content = $page->content;
        $this->isPublished = $page->is_published;

        $this->dispatchBrowserEvent('page:edit', $page->content);

        $this->isEditModeOn = true;

    }


    public function cancelPageEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->dispatchBrowserEvent('content:clear');
        $this->isEditModeOn = false;
    }


    private function preparedInitialData($locale = null)
    {
        if($locale){
            $this->locale = $locale;
        }
        else {
            $this->locale = app()->getLocale();
        }

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $this->pages = _Page::all();
    }


    public function isInputDataValid()
    {
        if($this->name && $this->slug){
            return true;
        }

        return false;
    }
}
