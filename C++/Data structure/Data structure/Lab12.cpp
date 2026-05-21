#include <iostream>
using namespace std;
int main(){
{
 	int number = 0;
 	do{
 	 	cout<< "Type a number (0 to exit) : ";
 		cin>>number;
 	 	if(number == 0) break;
 		if((number % 2) == 0) cout<<number<<" is even \n";
 		else cout<<number<<"is odd \n";
    }while(number != 0);
    return 0;
}}
