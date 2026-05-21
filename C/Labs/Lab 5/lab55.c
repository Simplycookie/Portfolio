#include <stdio.h>
#include <string.h>

char bookcode[6]="j";
int run=0,choice;
double total;
int main(){
    do{
        if (run==0)
        {
            printf("would you like to purchase a book? [press 1 for yes]");
            run = 1;
        }
        else{
            printf("would you like to continue?[press 1 for yes]");
        }
        fflush(stdin);
        scanf("%d",&choice);
        if (choice!=1)
        {
            if (run==0){printf("have a nice day");}
            else {printf("bill is : RM%.2f thank you for your purchase",total);}
            return 0;
        }
        printf("\nBook Code | Book Price\n");
        printf("B1001     | RM 34.50\n");
        printf("B1002     | RM 77.30\n");
        printf("B1003     | Rm 54.90\n\n");
        printf("which book do you want to buy?");
        fflush(stdin);
        gets(bookcode);
        if (strcmp(bookcode,"B1001")==0){choice = 1;}
        else if (strcmp(bookcode,"B1002")==0){choice = 2;}
        else if (strcmp(bookcode,"B1003")==0){choice = 3;}
        else{choice = 0;}
        switch (choice)
        {
        case 1:
            printf("purchased B1001 | Cost = RM34.50\n");
            total += 34.50;
            break;
        case 2:
            printf("purchased B1002 | Cost = RM77.30\n");
            total += 77.30;
            break;
        case 3:
            printf("purchased B1003 | Cost = RM54.90\n");
            total += 54.90;
            break;
        default:
            printf("invalid bookcode\n");
            break;
        }
        printf("total cost = RM%.2f\n\n", total);
        choice = 1;
    } while (choice==1);
    return 0;
}