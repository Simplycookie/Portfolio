 
#include<iostream> 
 
using namespace std; 
class Bags 
{ 
   string brand; 
   float height, length, width; 
  
    public: 
    void setdata() 
    {    
        cout<<"Enter your bag's brand name: "; 
        cin.ignore(); // Clear the input buffer
        getline(cin, brand); 
        cout<<"Enter value length, width and height of your bag L, W, H "; 
        cin>>length>>width>>height;   
    } 
      
    void display() 
    {   
        cout<<"\nYour brand bag name is **"<<brand<<"** and the dimensions are: " 
        <<length<<"L "<<width<<"W "<<height<<"H "<<endl; 
    } 
      
    Bags (const Bags &bi) 
    {  
        brand = bi.brand; 
        length = bi.length; 
        width = bi.width; 
        height = bi.height; 
        cout<<"\nDo you have the same bag??"<<endl; 
    } 
      
    Bags() 
    {  
        brand = "Adidas"; 
        length = 35; 
        width = 20; 
        height = 45; 
    }
    friend void check(Bags a, Bags b, Bags c);
}; 

void check(Bags a, Bags b, Bags c)
{
    if(a.brand == b.brand && a.brand == c.brand){
        cout<<"\nCommon brand for all 3 Bags"<<endl;
    }
    if(a.length == b.length && a.length == c.length){
        cout<<"\nCommon length for all 3 Bags"<<endl;
    }
    if(a.width == b.width && a.width == c.width){
        cout<<"\nCommon width for all 3 Bags"<<endl;
    }
    if(a.height == b.height && a.height == c.height){
        cout<<"\nCommon height for all 3 Bags"<<endl;
    }
    cout<<"--------------------------"<<endl;
}

int main() 
{       //need to developed by adding object k, l and m;  
    Bags k;
    k.setdata();
    k.display();
    Bags l;
    l.display();
    Bags m(l);
    m.display();

    //b part
    Bags bag[3];
    for(int i=0; i<3; i++){
        bag[i].setdata();
    }
    check(bag[0], bag[1], bag[2]);
} 