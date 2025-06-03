erDiagram
  act {
    int id PK "Primary key"
    int contract_id FK "References contract"
    string signed
    int act_type_id FK "References act_type"
    int rent_id FK "References rent"
    datetime created_at
    datetime updated_at
    datetime deleted_at
  }
  actrow {
    int id PK "Primary key"
    int act_id FK "References act"
    datetime created_at
    datetime updated_at
  }
  addon {
    int id PK "Primary key"
    string name
    string description
    int price_list_id FK "References price_list"
    int pricelist_id FK "References pricelist"
    datetime created_at
    datetime updated_at
  }
  booking {
    int id PK "Primary key"
    int rent_unit_id FK "References rent_unit"
    string book_at
    string book_until
    int organization_id FK "References organization"
    datetime time_in_minutes
    int user_id FK "References user"
    int rentunit_id FK "References rentunit"
    datetime created_at
    datetime updated_at
  }
  bookingtime {
    int id PK "Primary key"
    int pricelist_id FK "References pricelist"
    int tariff_id FK "References tariff"
    int rentunit_id FK "References rentunit"
    datetime created_at
    datetime updated_at
  }
  contract {
    int id PK "Primary key"
    string contract_num
    string 1c_contract_num
    datetime created_at
    datetime updated_at
    datetime deleted_at
  }
  organization {
    int id PK "Primary key"
    string full_name
    string ur_address
    string post_address
    string bank
    string inn
    string kpp
    float bank_account
    float bank_corr_account
    string bik
    string okpo
    datetime created_at
    datetime updated_at
  }
  payment {
    int id PK "Primary key"
    int bill_id FK "References bill"
    datetime created_at
    datetime updated_at
    datetime deleted_at
  }
  price {
    int id PK "Primary key"
    int tariff_id FK "References tariff"
    int pricelist_id FK "References pricelist"
    datetime created_at
    datetime updated_at
  }
  rent {
    int id PK "Primary key"
    datetime registration_date
    int organization_id FK "References organization"
    int price_id FK "References price"
    string number_of_places
    string rent_at
    int contract_id FK "References contract"
    int tariff_id FK "References tariff"
    string status
    datetime created_at
    datetime updated_at
  }
  rentunit {
    int id PK "Primary key"
    int type_id FK "References rentunittype"
    int unit_id FK "References unit"
    int workplace_id FK "References workplace"
    datetime created_at
    datetime updated_at
    datetime deleted_at
  }
  req {
    int id PK "Primary key"
    int user_id FK "References user"
    datetime created_at
    datetime updated_at
  }
  tariff {
    int id PK "Primary key"
    string name
    string description
    int price_list_id FK "References price_list"
  }
  user {
    int id PK "Primary key"
    string name
    string email
    string password
    string role
    int organization_id FK "References organization"
    int organisation_id FK "References organisation"
    datetime created_at
    datetime updated_at
  }
  workplace {
    int id PK "Primary key"
    int rent_id FK "References rent"
    int workplace_id FK "References workplace"
    int rent_unit_id FK "References rent_unit"
    datetime created_at
    datetime updated_at
  }
  act ||--o| bill : "bill"
  act ||--|{ actrow : "actRows"
  act }|--|| rent : "rent"
  actrow }|--|| act : "act"
  addon }|--|| pricelist : "priceList"
  bill ||--|{ payment : "payments"
  booking }|--|| user : "user"
  booking }|--|| rentunit : "rentUnit"
  bookingtime }|--|| pricelist : "priceList"
  bookingtime }|--|| tariff : "tariff"
  bookingtime }|--|| rentunit : "rentUnit"
  organization ||--|{ user : "user"
  payment }|--|| bill : "bill"
  price ||--|{ rent : "rent"
  price }|--|| tariff : "tariff"
  price }|--|| pricelist : "priceList"
  rent ||--|{ act : "act"
  rent ||--|{ workplace : "workplace"
  rent }|--|| contract : "contract"
  rent }|--|| organization : "organization"
  rent }|--|| price : "price"
  rent }|--|| tariff : "tariff"
  rentunit ||--|{ bookingtime : "bookingTime"
  rentunit ||--|{ booking : "booking"
  rentunit ||--|{ actrow : "actRows"
  rentunit }|--|| rentunittype : "type"
  rentunit }|--|{ workplace : "workplace"
  rentunittype ||--|{ rentunit : "rentUnits"
  req }|--|| user : "user"
  tariff ||--|{ price : "price"
  tariff ||--|{ bookingtime : "bookingTime"
  tariff ||--|{ rent : "rent"
  workplace }|--|| rent : "rent"
  workplace }|--|{ rentunit : "rentUnit"
