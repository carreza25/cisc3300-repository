<?php
namespace Store;

class Item {
    private $name;
    private $price;
    private $description;
    private $id;

    public function __construct($id, $name, $price, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function toJson() {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description
        ]);
    }
}
?>
