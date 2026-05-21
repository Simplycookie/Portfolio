#include <iostream>
using namespace std;
int sum(int arr[], int size){
    int total = 0;
    for(int i=0;i<size;i++){
        total += arr[i];
    }
    return total;
}
int product(int arr[], int size){
    int prod = 1;
    for(int i=0;i<size;i++){
        prod *= arr[i];
    }
    return prod;
}
int maximum(int arr[], int size){
    int maxnum = arr[0];
    for(int i=1;i<size;i++){
        if(arr[i] > maxnum) maxnum = arr[i];
    }
    return maxnum;
}
int minimum(int arr[], int size){
    int minnum = arr[0];
    for(int i=1;i<size;i++){
        if(arr[i] < minnum) minnum = arr[i];
    }
    return minnum;
}
int average(int arr[], int size){
    int total = sum(arr, size);
    return total / size;
}

int main(){
{
    int* numbers = new int[1];
    int size;
    int operation;
    cout<<"Enter the operation you want to perform\n";
    cout<<"(1) find sum\n";
    cout<<"(2) find product\n";
    cout<<"(3) find maximum\n";
    cout<<"(4) find minimum\n";
    cout<<"(5) find average\n";
    cout<<"Enter Operation number :";
    cin>>operation;
    cout<<"Enter number of elements :";
    cin>>size;
    delete[] numbers;
    numbers = new int[size];
    for(int i=0;i<size;i++){
        cout<<"Enter element"<<i+1<<": ";
        cin>>numbers[i];
    }
    switch(operation){
        case 1:
            cout<<"Sum is : "<<sum(numbers, size);
            break;
        case 2:
            cout<<"Product is : "<<product(numbers, size);
            break;
        case 3:
            cout<<"Maximum is : "<<maximum(numbers, size);
            break;
        case 4:
            cout<<"Minimum is : "<<minimum(numbers, size);
            break;
        case 5:
            cout<<"Average is : "<<average(numbers, size);
            break;
        default:
            cout<<"Invalid operation number";
            break;
    }
}
}