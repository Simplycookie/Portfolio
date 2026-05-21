#include<iostream>
#include<cmath>
int getinput();
int main(){
    int total=0,num=0;
    std::cout<<"Enter -1 to stop the programme\n";
    do{
        total+=num;
        num = getinput();
    } while (num!=-1);
    std::cout<<"The total is "<<total;
}

int getinput(){
	int input;
	std::cout<<"Enter an interger ;";
	std::cin>>input;
    return input;
}