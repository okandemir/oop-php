# Cli ile çalıştırma

Proje ana dizini içerisinde aşağıdaki komutu çalıştırabilirsiniz.
```
php index.php
```

# Mock Data
data/ dizinde bulunan mock.json dosyasında değişiklikler yaparak projeyi test edebilirsiniz. 
```
{
  "shelfs": [
    {
      "name": "Birinci Raf",
      "limit": 20,
      "goodsCount": 20
    },
    {
      "name": "İkinci Raf",
      "limit": 20,
      "goodsCount": 19
    },
    {
      "name": "Üçüncü Raf",
      "limit": 20,
      "goodsCount": 20
    }
  ]
}
```

# Çıktı Örneği
```
##############################

- DOLAP DURUMU -

# Doluluk Oranı: KISMEN DOLU

# Birinci Raf
Limit :20
Stok Adedi: 19

# İkinci Raf
Limit :20
Stok Adedi: 20

# Üçüncü Raf
Limit :20
Stok Adedi: 20

##############################
```


