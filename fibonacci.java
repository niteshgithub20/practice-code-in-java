import java.util.Scanner;
class A 
{
    public static void main(String [] arggs){
        System.out.println("Enter the number , when you times to print");
        Scanner sc=new Scanner(System.in);
        int count=sc.nextInt();
        int a,b,abTakKaSum;
        a=0;b=1;
        abTakKaSum=0;
        for(int i=0;i<count;i++){
            abTakKaSum = a + b;
            a=b;
            b=abTakKaSum;
            System.out.println(abTakKaSum);
        }
        System.out.println("############################");
    }
}