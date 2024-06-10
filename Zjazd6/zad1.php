<?php

class NoweAuto {
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;

    public function __construct($model, $cenaEuro, $kursEuroPLN) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function obliczCene() {
        return $this->cenaEuro * $this->kursEuroPLN;
    }
}

class AutoZDodatkami extends NoweAuto {
    private $alarm;
    private $radio;
    private $klimatyzacja;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm = 0.0, $radio = 0.0, $klimatyzacja = 0.0) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function obliczCene() {
        $cenaPodstawowa = parent::obliczCene();
        $dodatki = $this->alarm + $this->radio + $this->klimatyzacja;
        return $cenaPodstawowa + $dodatki;
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    private $procentUbezpieczenia;
    private $lataPosiadania;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $procentUbezpieczenia, $lataPosiadania) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentUbezpieczenia = $procentUbezpieczenia;
        $this->lataPosiadania = $lataPosiadania;
    }

    public function obliczCene() {
        $wartoscSamochodu = parent::obliczCene();
        $znizka = 1 - ($this->lataPosiadania / 100);
        return $this->procentUbezpieczenia * $wartoscSamochodu * $znizka;
    }
}
$noweAuto = new NoweAuto("Model A", 20000, 4.5);
echo "Cena Nowego Auta w PLN: " . $noweAuto->obliczCene() . " PLN\n";

$autoZDodatkami = new AutoZDodatkami("Model B", 25000, 4.5, 500, 300, 1000);
echo "Cena Auta z Dodatkami w PLN: " . $autoZDodatkami->obliczCene() . " PLN\n";

$ubezpieczenie = new Ubezpieczenie("Model C", 30000, 4.5, 600, 400, 1200, 0.05, 3);
echo "Cena Ubezpieczenia w PLN: " . $ubezpieczenie->obliczCene() . " PLN\n";

?>
