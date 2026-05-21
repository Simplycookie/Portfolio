#include<iostream>
#include<iomanip>
#include<stdio.h>
#include<string.h>
using namespace std;

class Books 
{ 
private: 
string isbnNo, title, author; 
char temp[100];
float price, discountedprice, discountperc; 
public: 
Books(); 
Books(string,string,string,float,float); 
void set_Data(); 
void calcDiscountedPrice(); 
void print(); 
float getDiscountedPrice(); 
~Books(); 
};
Books::Books(){
    isbnNo = ""; 
    title = ""; 
    author = ""; 
    price = 0; 
    discountedprice = 0; 
    discountperc = 0; 
}
Books::Books(string i, string t, string a, float p, float d){
    isbnNo = i; 
    title = t; 
    author = a; 
    price = p; 
    discountedprice = 0; 
    discountperc = d; 
}
void Books::set_Data(){
    cout<<"Enter ISBN\t: ";
    gets(temp);
    isbnNo = temp;
    cout<<"Enter Title\t: ";
    gets(temp);
    title = temp;
    cout<<"Enter Author\t: ";
    gets(temp);
    author = temp;
    cout<<"Enter Price\t: ";
    cin>>price;
    cout<<"Enter Discount Percentage: ";
    cin>>discountperc;
}
void Books::calcDiscountedPrice(){
    discountedprice = price - (price * discountperc / 100);
}

void Books::print(){
    cout<<"--------------------------------------------------------"<<endl;
    cout<<"                  Book Details "<<endl;
    cout<<"--------------------------------------------------------"<<endl;
    cout<<"ISBN \t\t :"<<isbnNo<<endl;
    cout<<"Title\t\t :"<<title<<endl;
    cout<<"Author\t\t :"<<author<<endl;
    cout<<"Original Price\t :"<<price<<endl;
    cout<<"Discounted Price\t :"<<discountedprice<<endl;
}
float Books::getDiscountedPrice(){
    return discountedprice;
}
Books::~Books(){
    cout<<"Enjoy reading "<<title<<endl;
}

int main(){
    float HighestPrice = 0;
    int numbook_under_30 = 0;
    Books book1("102009912","7 Habits of Highly Effective People","Stephen Covey",400.00, 30);
    Books book[3];
    cout<<"........Book of the Month...... "<<endl<<endl;
    book1.calcDiscountedPrice();
    book1.print();
    cout<<"Now we shall enter and display the details for 3 special books..."<<endl;
    for(int i=0; i<3; i++){
        book[i].set_Data();
        book[i].calcDiscountedPrice();
        book[i].print();
        if(book[i].getDiscountedPrice() > HighestPrice){
            HighestPrice = book[i].getDiscountedPrice();
        }
        if(book[i].getDiscountedPrice() < 30){
            numbook_under_30++;
        }
    }
    cout<<"---------------------------------------------------------"<<endl;
    cout<<"The most epensive book is: RM "<<HighestPrice<<endl;
    cout<<"The number of books under RM 30 is: "<<numbook_under_30<<endl;

}