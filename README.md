# Logic Spark API

# Install 
- composer insall

# Config 
- DB_CONNECTION=sqlite
- DB_DATABASE={PROJECT_PATH}/database/database.sqlite


## Category API

| URL | Parameter name | Method | Desc |
| ------ | ------ | ------ | ------ |
| /api/category/get/{id} | id : integer | GET | Get Category By ID |
| /api/category/getAll |  | GET | Get Category All |
| /api/category/getWithProduct |  | GET | Get Category All With Product |
| /api/category/store | name : string(255) | POST |  Insert Category |
| /api/category/update | id:integer , name : string(255) | PUT |  Update Category |
| /api/category/delete | id:integer  | DELETE |  Delete Category |


## Product API

| URL | Parameter name | Method | Desc |
| ------ | ------ | ------ | ------ |
| /api/product/get/{id} | id : integer | GET | Get Product By ID |
| /api/product/getAll |  | GET | Get Product All |
| /api/product/store | category_id:integer , name : string(255) | POST |  Insert Product |
| /api/product/update | id:integer , category_id:integer  , name : string(255) | PUT |  Update Product |
| /api/product/delete | id:integer  | DELETE |  Delete Product |
