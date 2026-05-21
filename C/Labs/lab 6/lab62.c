#include <stdio.h>
#include <string.h>
char choice;
void get_input();
void cm_to_inches(float cm);

int main(){
    do
    {
        get_input();
        printf("Continue <Y - Yes\tN - No>: ");
        fflush(stdin);
        scanf("%c",&choice);
} while (choice == 'Y');
} 

void get_input(){
    float cm;
    printf("Enter centimeter : ");
    scanf("%f",&cm);
    cm_to_inches(cm);
}

void cm_to_inches(float c){
    float inches = c * 0.394;
    printf("%.2f cm equals to %.2f inches\n", c, inches);
}
   