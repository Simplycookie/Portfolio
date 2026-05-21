#include <iostream>
using namespace std;
int Binary_search(int searched_value, int box[], int size){
    int first = 0, last = size-1, middle;
    while(first<=last){
        middle = (first+last)/2;
        if(searched_value<box[middle]){
            last=middle-1;
        }
        else if (searched_value>box[middle])
        {
            first=middle+1;
        }
        else return middle;
    }
}

void bobble_sort(int *arr,int size){
    int i,j,temp;
    for (i = size; i >= 0; i--)
    {
        for(j=0;j<i-1;j++){
            if(*(arr+j)>*(arr+j+1)){
                temp = *(arr+j+1);
                *(arr+j+1)=*(arr+j);
                *(arr+j)=temp;
            }
        }
    }
}

int main(){
{
    int *arr,invalue,size,searched_value;
    cout<<"Enter array size: ";
    cin>>size;
    arr = new int[size];
    for(int i=0;i<size;i++){
        cout<<"Enter element of index "<<i<<":";
        cin>>*(arr+i);
    }
    bobble_sort(arr,size);
    for(int i=0;i<size;i++){
        cout<<*(arr+i)<<endl;
    }
    cout<<"Enter element to search: ";
    cin>>searched_value;
    int found = Binary_search(searched_value,arr,size);
    cout<<"Element found at index: "<<found;
}}