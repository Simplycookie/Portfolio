#include <stdio.h>
float weight;
float rates;
float total;
char Iron[5];
float ironrate;

int main(){
    printf("---------------------------\n");
    printf("\tWelcome to Clean Laundry\n");
    printf("---------------------------\n");
    printf("Laundry wieght\t:");
    scanf("%f",&weight);
    printf("\n\nNeed Ironing [Y/N]");
    scanf("%s",&Iron);
    printf("\n\n\"Your bill");
    if(weight > 5){
        if(weight > 10){
            if(weight > 15){
                rates = 2.50;
            }
            else{
                rates = 2.00;
            }
        }
        else{
            rates = 1.50;
        }
    }
    else{
        rates = 1.00;
    }
    if(Iron=='Y'||Iron=='y'){
        ironrate = 5.00;
    }
    total += ironrate + rates;
    printf("----------");
    printf("weight\t: %.2f\n",weight);
    printf("rates\t: %.2f\n",rates);
    printf("Iron\t: %s,(RM%.2f)\n",Iron,ironrate);
    printf("Bill\t\t: RM%.2f",total);
}


