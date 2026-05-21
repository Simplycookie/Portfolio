//Muhammad Arfan, 243DC243FZ, TC1L
#include <stdio.h>
const double Chocolate_price = 1.30;
char Name[4] = "john";
int quantity = 5;
double Total = 0;
int main(){
    printf("Chocolate price: %.2lf",Chocolate_price);
    printf("\n%s bought %d units of Chocolate\n",Name,quantity);
    Total = Chocolate_price * quantity;
    printf("\nTotal amount to pay: %.2lf",Total);
    return 0;
}