#include <stdio.h>

float rainfall[5] = {5.67, 10.9, 2.03, 12.08, 7.11};
float get_min(float rain[5]){
    int i,j=0,ToF=1;
    while (i > -1)
    {
        ToF = 1;
        for (i = 0; i < 5; i++)
        {
            if(rain[j] > rain[i]){
                ToF = 0;
            }
        }
        if(ToF == 1){
            return rain[j];
        }
        j += 1;
    }
}

float get_max(float rain[5]){
    int i,j=0,ToF=1;
    while (i > -1)
    {
        ToF = 1;
        for (i = 0; i < 5; i++)
        {
            if(rain[j] < rain[i]){
                ToF = 0;
            }
        }
        if(ToF == 1){
            return rain[j];
        }
        j += 1;
    }
}

int main(){
    printf("5 months rain fall statistics.\n");
    printf("------------------------------\n");
    int i;
    for (i = 0; i < 5; i++)
    {
        printf("Months %d : %.2f ml\n",i+1,rainfall[i]);
    }
    printf("\nMinimum rain fall : %.2f ml\n", get_min(rainfall));
    printf("Maximum rain fall : %.2f ml", get_max(rainfall));
}