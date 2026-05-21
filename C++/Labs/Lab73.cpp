#include<iostream> 
using namespace std; 
 
class NumberGame 
{ int array[5]; 
  public: 
    NumberGame(){
        array[0] = 15;
        array[1] = 20;
        array[2] = 33;
        array[3] = 38;
        array[4] = 100;
    } 
    friend void search(NumberGame , int*); 
}; 
 
void search(NumberGame a, int* ptr){
    int i=-1;
    do{
        i++;
    }while(a.array[i] != *ptr && i<5);
    if(i<5){
        cout<<*ptr<<" HaHa you Are Correct"<<endl;
    }
    else{
        cout<<*ptr<<" HaHA you ARE Wrong"<<endl;
    }
}
    
       
int main() 
{   NumberGame g ; 
    int num; 
    cout<<"Let Us Play game...\nEnter a Number :"; 
    cin>>num; 
     
    search(g, &num); 
    return 0; 
} 