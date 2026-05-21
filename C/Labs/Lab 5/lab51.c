#include <stdio.h>
#include <string.h>

char product_name[30];
float product_price,total_price;

int main()
{
    int i;
    for(int i=3; i>0; i--){
        printf("Enter product's name\t: ");
        scanf("%s",&product_name);
        printf("Enter the price\t:");
        scanf("%f",&product_price);
        printf("%s\t:\tRM%.2f\n",product_name,product_price);
        total_price += product_price;
    }
    printf("Total amount \t\tRM%.2f",total_price);
    return 0;
}
