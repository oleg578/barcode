# barcode

## working directory  /var/www/html/barcode

## default page

simple single input text box that autofocuses, with submit button

will be used for 'barcode' in printing script

also store all barcodes that are printed upon submit, along with timestamp, username , printer

## add printer

ability to add printer ( name | ip | port )
ability to delete printer

## add user

add username (first name | last name | active | addedDate )
disable username

## ZPL edit

don't want to have to edit the ZPL code inside the code, want a simple add new and make default, keeping all old codes with datetime stamp

## Reports Page

page to see current prints per user per day | week | month ( also export as csv )

### forgot one part

need 2 drop-downs

1. select user
2. select printer

these should hold their values till changed either by session or cookie
