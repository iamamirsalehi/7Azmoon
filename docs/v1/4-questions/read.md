# **Get List Of questions**

## GET ``/api/v1/questions``

**GET Query Params**:
- ``search`` : search keyword (search-fields: title)
- ``page`` : page number
- ``pagesize`` : number of records in page (default:20)

<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // array of records
}
```