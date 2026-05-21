 
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
}; 
 
int main() 
{       //need to developed by adding object k, l and m;  
    Bags k;
    k.setdata();
    k.display();
    Bags l;
    l.display();
    Bags m(l);
    m.display();


} 