# **Create New question**

## POST ``/api/v1/questions``

**POST Params**:
- ``id`` : question id
- ``quiz_id`` : quiz id
- ``title`` :  title : string
- ``options`` : json ["1" => {"text"=>"stringValue","is_correct":1},"2" => {"text"=>"stringValue"}, ...]
- ``score`` :  int
- ``is_active`` :  activation status

<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // created question data
}
```