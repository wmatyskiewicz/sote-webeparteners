Integracja soteshop z webepartners
==================================

Edytuj plik soteshop/apps/frontend/modules/stOrder/templates/theme/``theme-name``/order_summary.html 
gdzie ``theme-name`` to aktualnie używana skórka na końcu doklejając zawartość pliku ``order_summary.html`` z tego repozytorium zmieniajac ``xxx_mid`` na identyfikator Webepartners, ``xxx_host``, ``xxx_user``, ``xxx_password``, ``xxx_db`` na dane dostępowe do bazy danych


Generowanie XML
===============

Skopiuj do publicznego katalogu plik webep-xml-generator.php a następnie dodaj do cronjobs polecenie: ::

  php /home/user/domains/simple.com/public_html/soteshop/web/webep-xml-generator.php >> /home/user/domains/simple.com/public_html/soteshop/web/xml/products.xml

plik znajdować się będzie pod adresem www.simple.com/xml/products.xml
