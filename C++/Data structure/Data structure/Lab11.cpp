#include <iostream>
using namespace std;
int main(){
{
 	int numbers[4];
 	int maxnum = 0;
 	cout<<"Enter four intergers :";
 	for(int i=0;i<4;i++){
 	 	cin>>numbers[i];
 	 	if(numbers[i] > maxnum) maxnum = numbers[i];
 	}
 	cout<<"Maximun number : "<<maxnum;
 	return 0;
}}
