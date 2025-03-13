<?php
class Animal {
    public $animals = ["kucing", "harimau", "kelinci", "buaya", "ular"];

    function index(){
        echo "<ol>";
        foreach ($this->animals as $key => $value){
            echo "<li>$value</li>";
        }
        echo "</ol>";
    }
    function store($hewan){
        array_push($this->animals, $hewan);

        $this->index();
    }
    public function update($key, $value){
        
        if(isset($this->animals[$key])) {
            $this->animals[$key] = $value;
            $this->index();
        } else{
            echo "hewan tidak ditemukan";
        }
    }
    public function destroy($key){
        if(isset($this->animals[$key])) {
            unset($this->animals[$key]);
            $this->index();
        } else{
            echo "hewan tidak ditemukan";
        }
    }
}

$hewan = new Animal();
echo "Index - menampilkan seluruh data hewan <br>";
$hewan->index();
echo "<br>";

echo "Store - menambahkan data hewan baru (burung) <br>";
$hewan->store("burung");
echo "<br>";

echo "update - mengubah data hewan<br>";
$hewan->update(6,"elang");
echo "<br>";

echo "Destroy- menghapus data hewan<br>";
$hewan->destroy(0);
echo "<br>";
?>