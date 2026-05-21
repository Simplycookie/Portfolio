#include<iostream> 
using namespace std; 
 
class Fraction 
{   
    int Denom,Nume;
    public:
    int getDenom(){
        return Denom;
    }
    int getNume(){
        return Nume;
    }
    void setData(int N,int D){
        Nume = N;
        Denom = D;
    }
}; 
 
int isValid(Fraction ob) 
{  int valid; 
   if (ob.getDenom()==0) 
  {  valid = 0; 
     cout<<"\nAlert: Denominator is having value zero "<<endl; 
  }  
  else if (ob.getNume()>ob.getDenom()) 
  {  valid = 0; 
    cout<<"\nAlert: Numerator greater than denominator\n"<<endl; 
     } 
  else 
    valid = 1;  
 return valid; 
} 
 
int main() 
{ Fraction ob1[3]; 
 for(int i=0; i<3; i++) 
 { ob1[i].setData(i+1,2-i); 
    cout<<"                "<<ob1[i].getNume()<<endl;
    cout<<"The fraction is--"<<endl;
    cout<<"                "<<ob1[i].getDenom()<<endl;
    if (isValid(ob1[i]) == 1){
        cout<<"this fraction is Valid\n\n";

  }
 } 
 return 0; 
}