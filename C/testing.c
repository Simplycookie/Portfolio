#include <stdio.h>

int numbers[] = {13,25,34,42,55};

int arr[] = {1,2,3};
main()
{
   int numbers[]={10,8,34,100,3,12,14,7};
    int *a, *b;
	
    a = &numbers[3];
    b = numbers;
	
    printf("\n %d", *a + *b);
    printf("\n %d", *a-- - ++*b);
    printf("\n %d", *(a+2) + *b+15);

    int *ptr; 
    ptr = arr;
    ptr = ptr+5;
    printf("%d",*ptr);

}

//int main(){
//    printf("\n %d",*a + *b);
//    printf("\n %d", *a++);
 //   printf(" %d", *a);
 //   printf("\n %d", ++*b);
 //   printf(" %d",*b);
    
//}