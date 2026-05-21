#include<iostream>
#include<iomanip>
int oddcount,evencount;
void odd_even_counter(int*);

int main(){
    int num_of_instance, num, total = 0;
    std::cout<<"how many numbers would you like to add";
    std::cin>>num_of_instance;
    for (int i = 0; i < num_of_instance; i++){
        std::cout<<"Enter a number :";
        std::cin>>num;
        odd_even_counter(&num);
        total = total + num;
    }
    std::cout<<"There are "<<evencount<<" even numbers and "<<oddcount<<" odd numbers.\n";
    std::cout<<"The total of all the "<<num_of_instance<<" numbers are "<<total;
}
void odd_even_counter(int *num){
    if(*num%2==0){evencount++;}
    else{oddcount++;}
    return;
}
