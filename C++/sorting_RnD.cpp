#include <iostream>
using namespace std;

double douarray[100];

struct basket{
    double val;
    int val_index;
    double temp;
    int temp_index;
};

double basketsort_5(double arr[],int size){
    basket bas[3];
    int progress=0;
    int i = progress;
    int iteration=0;
    while (progress < size)
    {
        bas[0].val = 999999;
        bas[1].val = 999999;
        bas[2].val = 999999;
        bas[0].val_index = 0;
        bas[1].val_index = 0;
        bas[2].val_index = 0;
        bas[0].temp = -1;
        bas[1].temp = -1;
        bas[2].temp = -1;
        for(i = progress;i<size;i++){
            cout<<"i = "<<i<<" ";
            if(arr[i]<=bas[2].val){
                if(arr[i]<=bas[1].val){
                    if(arr[i]<=bas[0].val){
                        bas[2].val = bas[1].val;
                        bas[1].val = bas[0].val;
                        bas[0].val = arr[i];
                        cout<<endl<<"smallest found: "<<bas[0].val<<endl;
                        bas[2].val_index = bas[1].val_index;
                        bas[1].val_index = bas[0].val_index;
                        bas[0].val_index = i;
                    }
                    else{
                        bas[2].val = bas[1].val;
                        bas[1].val = arr[i];
                        bas[2].val_index = bas[1].val_index;
                        bas[1].val_index = i;
                    }
                }
                else{
                    bas[2].val = arr[i];
                    bas[2].val_index = i;
                }
            }
        }
        bas[0].temp = arr[progress++];
        bas[0].temp_index=progress-1;
        bas[1].temp = arr[progress++];
        bas[1].temp_index=progress-1;
        bas[2].temp = arr[progress++];
        bas[2].temp_index=progress-1;
        cout<<endl<<"temps :"<<bas[0].temp<<" "<<bas[1].temp<<" "<<bas[2].temp<<" "<<arr[progress-3]<<" "<<arr[progress-2]<<" "<<arr[progress-1]<<endl;
        progress -= 3;
        arr[progress++] = arr[bas[0].val_index];
        arr[progress++] = arr[bas[1].val_index];
        arr[progress++] = arr[bas[2].val_index];
        /*if(bas[0].val_index>progress){
            arr[bas[0].val_index] = bas[0].temp;
        }
        if(bas[1].val_index>progress){
            arr[bas[1].val_index] = bas[1].temp;
        }
        if(bas[2].val_index>progress){
            arr[bas[2].val_index] = bas[2].temp;
        }
            */
        iteration++;
        cout<<"iterartion "<<iteration<<endl<<"progress :"<<progress<<endl;
        cout<<"bas.val 0 :"<<bas[0].val<<"bas.val 1 :"<<bas[1].val<<"bas.val 2 :"<<bas[2].val<<endl;
        for(i=0;i<size;i++){
            cout<<arr[i]<<" ";
        }
        cout<<endl;
    }
    cout<<"Final: ";
    for(i=0;i<size;i++){
        cout<<arr[i]<<" ";
    }
    return 0;
}

int main(){
    double test_array[30] = {12.34, 98.76, 45.67, 23.45, 67.89, 10.11, 54.32, 76.54, 88.99, 32.10, 11.22, 33.44, 55.66, 77.88, 99.00, 21.21, 43.43, 65.65, 87.87, 19.19, 28.39, 47.58, 66.77, 85.96, 14.25, 36.47, 58.69, 80.91, 92.13, 24.35};
    //{12.34, 98.76, 45.67, 23.45, 67.89, 10.11, 54.32, 76.54, 88.99, 32.10, 11.22, 33.44, 55.66, 77.88, 99.00, 21.21, 43.43, 65.65, 87.87, 19.19, 28.39, 47.58, 66.77, 85.96, 14.25, 36.47, 58.69, 80.91, 92.13, 24.35, 46.57, 68.79, 12.01, 34.23, 56.45, 78.67, 90.89, 13.14, 35.36, 57.58, 79.79, 91.91, 15.15, 37.37, 59.59, 81.81, 93.93, 16.16, 38.38, 60.60, 82.82, 94.94, 17.17, 39.39, 61.61, 83.83, 95.95, 18.18, 40.40, 62.62, 84.84, 96.96, 19.19, 41.41, 63.63, 85.85, 97.97, 20.20, 42.42, 64.64, 86.86, 98.98, 21.21, 43.43, 65.65, 87.87, 99.99, 22.22, 44.44, 66.66, 88.88, 12.12, 23.23, 34.34, 45.45, 56.56, 67.67, 78.78, 89.89, 90.90, 11.11, 22.22, 33.33, 44.44, 55.55, 66.66, 77.77, 88.88, 99.99, 100.00};
    basketsort_5(test_array,30);
}