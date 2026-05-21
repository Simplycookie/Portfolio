#include <stdio.h>
#define inch_to_cm 2.54

float cm[5], inches[5];
int counter;
int main(){
    for (counter = 0; counter < 5; counter++)
    {
        printf("Enter value of inches : ");
        scanf("%f",&inches[counter]);
    }
    printf("\nHere are the results of the conversion.\n-------------------------------------\n");
    for (counter = 0; counter < 5; counter++)
    {
        cm[counter] = inches[counter] * inch_to_cm;
        printf("%.2f inch(es) ===> %.2f cm(s)\n",inches[counter],cm[counter]);
    }
    
}