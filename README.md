# module-barcode
Barcode generator action module

## Usage in CMS Pages

**Slash Delimited Query Parameter Pairs**
```html
<p>
  <img src="{{store url='barcode/barcode/generate/f/png/s/code39/d/12345'}}"/>
</p>
```

**Traditional Query Parameters**

```html
<p>
  <img src="{{store url='barcode/barcode/generate?f=png&s=code39&d=12345'}}"/>
</p>
```
**Frontend Result**

![Screen Shot 2021-09-03 at 2 30 56 AM](https://user-images.githubusercontent.com/4982916/131975635-fd9e85a7-c950-486f-af87-a033a36752f4.png)
