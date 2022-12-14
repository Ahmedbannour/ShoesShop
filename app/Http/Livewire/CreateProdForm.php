<?php

namespace App\Http\Livewire;

use App\Photo;
use App\Product;
use App\Sizes;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateProdForm extends Component
{
    use WithFileUploads;


    public $name;
    public $color;
    public $description;
    public $price;
    public $qteStock;
    public $size;
    public $qte;
    public $photo;
    public $inputs =[];

    public $totalSteps = 4;
    public $currentStep = 1;
    public $i = 0;



    public function mount()
    {
        $this->currentStep = 1;
    }


    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep>$this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function validateData()
    {
        if($this->currentStep == 1){
            $this->validate([
                    'name' => 'required|string|max:255',
                    'color' => 'required|string|max:255',
                    'description' => 'required|string|min:8',
                    'qteStock' => 'required|int',
                    'price' => 'required|int',
            ]);
        }elseif($this->currentStep ==2){
            $this->validate([
                'qte.0' => 'required|int',
                'photo.0' => 'required|string',
                'size.0' => 'required|string',
                'qte.*' => 'required|int',
                'photo.*' => 'image|max:1024',
                'size.*' => 'required|string',
        ]);
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function addProdItem($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }


    public function render()
    {
        $sizes= Sizes::all();
        return view('livewire.create-prod-form' , ['sizes'=>$sizes]);
    }

    public function createProd()
    {
        $this->resetErrorBag();
        $this->validate([
                    'qte.0' => 'required|int',
                    'photo.0' => 'image|max:1024',
                    'size.0' => 'required|string',
                    'qte.*' => 'required|int',
                    'photo.*' => 'image|max:1024',
                    'size.*' => 'required|string',
            ]);

        $prod = new Product();

        $prod->name = $this->name;
        $prod->description = $this->description;
        $prod->price = $this->price;
        $prod->qteStock = $this->qteStock;
        $prod->color = $this->color;
        $prodSaved = $prod->save();
        $id = 0;
        if($prodSaved){
            for($j=0 ; $j<=$this->i ; $j++){
                    $checkPh = Photo::where(
                        'name','=', $this->photo[$j]->getClientOriginalName(),
                    )->where(
                        'product_id','=', $prod->id,
                    )->first();
                    if($checkPh != null){
                        $checkPh->sizes()->attach($this->size[$j],['qte'=>$this->qte[$j],'photo_id'=>$checkPh->id]);
                    }else{
                        $ph = new Photo();
                        $phName =$this->photo[$j]->getClientOriginalName();
                        $this->photo[$j]->storeAs('/public/images/'.$this->name , $phName);
                        $ph->name = $phName;
                        $ph->product_id = $prod->id;
                        if($ph->save()){
                            session()->flash('success','Photo '.$ph->name. ' added successfully');
                            $id = $ph->id;
                        }else{
                            session()->flash('danger','Sorry ! photo '.$ph->name. ' added yet!!');
                        }
                        $ph->sizes()->attach($this->size[$j],['qte'=>$this->qte[$j],'photo_id'=>$ph->id]);
                    }
            }
            session()->flash('success','Product  '.$prod->name. ' Added successfully');
            $checkPh = Photo::where(
                'name','=', $this->photo[0]->getClientOriginalName(),
            )->where(
                'product_id','=', $prod->id,
            )->first();

        }else{
            session()->flash('danger','Sorry ! Product '.$prod->name. ' added yet!!');
        }
        return redirect()->route('admin.products.index');



    }
}
