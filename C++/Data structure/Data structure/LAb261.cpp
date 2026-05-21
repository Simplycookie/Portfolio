#include <iostream>
using namespace std;
void add(int &v1, int v2);  
int main()  
{ 
int array[]={10,20,30,40};  
int *x, *y;  
int a=2, b=4;  
 
x = array;  
b = *(x+3) + (*x+2);  
cout<<"b = "<<b<<endl;  
y = &b;  
*x = *y + 4;  
cout<<array[0]<<endl;  
int &c = a;  
c = x[1] + *y;  
cout<<"a = "<<a<<endl;  
add(c,array[2]);  
cout<<"c = "<<c<<endl;  
cout<<*(x+2)<<endl;  
 
return 0;  
} 
void add(int &v1, int v2) 
{  
v1 = v1 + 2;  
v2 = v2 + 2; 
} 