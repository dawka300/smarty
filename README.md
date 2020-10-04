Instrukcja do aplikacji testowej dla Programisty PHP:
1. Stworzenie modułu do łączenia się z bazą.
2. Stworzenie panelu do dodawania producentów.
3. Stworzenie panelu do dodawania produktów dla wybranego producenta, produkt po
dodaniu wyświetla się na zakładce producenta.
Produkt ma mieć:
- nazwę,
- cenę netto,
- vat %
- stan magazynowy.
4. Stworzenie panelu do zamawiania produktów - wystarczy wybrać producenta, produkt,
wpisać cenę, vat, liczbę sztuk (powinna się odejmować od stanu magazynowego - mamy na
stanie 10, klient zamawia 1, na stanie pozostaje 9).
W module wyświetla się lista zamówień.
To ma być prosty panel do wprowadzania zamówień.
5. Stworzenie raportu który będzie wylistowywał producentów, dla producentów będzie
pobierał łączną kwotę zamówień, sumę zamówionych produktów i obliczał procentowy
udział producenta w sprzedaży.
Opis raportu:
a: nazwa producenta
b: wartość zamówień producenta netto
c: wartość zamówień producenta brutto
d: łączna liczba sztuk zamówionych artykułów danego producenta
e: procentowa wartość zamówionych artykułów według kwoty netto
f: procentowa wartość zamówionych artykułów według kwoty brutto
g: procentowa wartość liczby zamówionych artykułów

a | b | c | d | e | f | g
----------------------------------------------------------------------------------------
FIRMA AKR | 100,00| 123,00| 1 | 25 % | 25 % | 25 %
FIRMA SUP | 100,00| 123,00| 1 | 25 % | 25 % | 25 %
FIRMA RTO | 200,00| 246,00| 2 | 50 % | 50 % | 50 %
----------------------------------------------------------------------------------------
sumy | 400,00| 492,00| 4 | 100 % | 100 % | 100 %

6. Wyniki z powyższej tabeli powinny mieć możliwość sortowania według kolumn rosnąco i
malejąco.
