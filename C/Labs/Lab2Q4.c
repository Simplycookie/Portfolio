//Muhammad Arfan, 243DC243FZ, TC1L
#include <stdio.h>
#define White_A4Price 0.05
#define Green_A4Price 0.10
#define Pink_A4Price 0.15
int White_A4, Green_A4, Pink_A4;
double Total;
double test = 2133232.1234;
int main(){
    printf("Quantity of White A4 papar :");
    scanf("%d",&White_A4);
    printf("Quantity of Green A4 papar :");
    scanf("%d",&Green_A4);
    printf("Quantity of Pink A4 papar  :");
    scanf("%d",&Pink_A4);

    printf("\nWhite A4 papar : RM %.2lf (%d x %.2lf)",White_A4*White_A4Price,White_A4,White_A4Price);
    printf("\nGreen A4 papar : RM %.2lf (%d x %.2lf)",Green_A4*Green_A4Price,Green_A4,Green_A4Price);
    printf("\nPink A4 papar  : RM %.2lf (%d x %.2lf)",Pink_A4*Pink_A4Price,Pink_A4,Pink_A4Price);
    Total = White_A4*White_A4Price + Green_A4*Green_A4Price + Pink_A4*Pink_A4Price;
    printf("\nTotal          : RM %.2lf",Total);
    printf("\n%010.0f",test);
    printf("\n%05.1f",test);
    printf("\n%010.2lf",test);


}